let notiInterval = null;
function onload() {
  displayChatrooms();
  let admin_id = document
    .querySelector(".chatroom_messages .messages")
    .getAttribute("admin_id");
  if (notiInterval != null) {
    clearTimeout(notiInterval);
  }
  autoReloadNoti(admin_id);
  document.addEventListener("click", function (event) {
    let arrow = document.getElementById("dropDown-chat-arrow");
    let chatrooms = document.querySelector(".chatrooms");
    if (screen.width < 768) {
      if (arrow.contains(event.target)) {
        chatrooms.style.left = "0%";
      } else if (
        document.contains(event.target) &&
        !chatrooms.contains(event.target)
      ) {
        chatrooms.style.left = "-55%";
      }
    }
  });
}
async function loadNoti(admin_id) {
  let form = new FormData();
  form.append("admin_id", admin_id);
  fetch("get_ch_noti.php", {
    method: "POST",
    body: form,
  })
    .then((response) => response.json())
    .then((chatroom_noti) => {
      if (chatroom_noti != "empty") {
        let rooms = document.querySelectorAll(".chatrooms .room");
        rooms.forEach((room) => {
          if (chatroom_noti[room.getAttribute("chatroomid")]) {
            room.setAttribute(
              "notification",
              chatroom_noti[room.getAttribute("chatroomid")]
            );
          }
        });
      }
    });
}
async function autoReloadNoti(admin_id) {
  await loadNoti(admin_id);
  notiInterval = setTimeout(() => autoReloadNoti(admin_id), 1000);
}
function displayChatrooms() {
  let chatroomsDiv = document.querySelector(".chatrooms");
  try {
    fetch("get_Ch.php")
      .then((response) => response.json())
      .then((chatrooms) => {
        if (chatrooms != "nope") {
          let divrooms = document.querySelectorAll(".room");
          divrooms.forEach((div) => div.remove());
          for (room of chatrooms) {
            let divRoom = document.createElement("div");
            divRoom.setAttribute("chatroomId", room["chatroom_id"]);
            divRoom.setAttribute("chatroomName", room["chatroom_name"]);
            divRoom.setAttribute("onclick", "selectChatroom(this)");
            divRoom.setAttribute("notification", "0");
            divRoom.classList.add("room");
            let divRoomText = document.createElement("div");
            divRoomText.classList.add("text");
            let divRoomTextH3 = document.createElement("h3");
            divRoomTextH3.innerHTML = room["chatroom_name"];
            let divRoomTextP = document.createElement("p");
            divRoomTextP.innerHTML = room["chatroom_description"];
            divRoomText.append(divRoomTextH3);
            divRoomText.append(divRoomTextP);
            divRoom.append(divRoomText);
            chatroomsDiv.append(divRoom);
          }
        }
      });
  } catch (error) {
    console.log(error);
  }
}
let messageInterval = null;

async function selectChatroom(element) {
  document.querySelector(".chatroom_messages .overlay").style.display = "none";
  let allOldMessages = document.querySelectorAll(
    ".chatroom_messages .messages .message"
  );
  allOldMessages.forEach((oldMsg) => oldMsg.remove());
  if (messageInterval) {
    clearTimeout(messageInterval);
  }
  let chatroomName = element.getAttribute("chatroomName");
  let chatroomId = element.getAttribute("chatroomId");

  document.getElementById("inputChatroomId").value = chatroomId;
  let messages = document.querySelector(".chatroom_messages .messages");
  let admin_id = messages.getAttribute("admin_id");
  resetChatroomNoti(element, chatroomId, admin_id);
  document.getElementById("chatName").innerHTML = chatroomName;
  let existMessages = new Array();
  await loadMessages(chatroomId, admin_id, messages, existMessages);
  let test = document.querySelectorAll(".message");
  if (test.length > 0) {
    test[test.length - 1].scrollIntoView();
  }
  autoUpdate(chatroomId, admin_id, messages, existMessages);
}
function resetChatroomNoti(element, chatroomId, admin_id) {
  let form = new FormData();
  form.append("chatroomId", chatroomId);
  form.append("admin_id", admin_id);
  fetch("resetChatroomNoti.php", {
    method: "POST",
    body: form,
  })
    .then((response) => response.json())
    .then((result) => {
      if (result != "nope") {
        element.setAttribute("notification", 0);
      }
    });
}
async function autoUpdate(chatroomId, admin_id, messages, existMessages) {
  await loadMessages(chatroomId, admin_id, messages, existMessages);
  messageInterval = setTimeout(
    () => autoUpdate(chatroomId, admin_id, messages, existMessages),
    1000
  );
}
async function loadMessages(chatroomId, admin_id, messages, existMessages) {
  try {
    const response = await fetch("get_messages.php");
    const messages_details = await response.json();
    if (messages_details != "nope") {
      for (oneMessgae of messages_details) {
        if (oneMessgae["chatroom_id"] == chatroomId) {
          if (!exist(oneMessgae["msg_id"], existMessages)) {
            let message = document.createElement("div");
            message.classList.add("message");
            message.setAttribute("message_id", oneMessgae["msg_id"]);
            let msg = document.createElement("div");
            msg.classList.add("msg");
            if (oneMessgae["admin_id"] == admin_id) {
              message.classList.add("current_user");
              msg.classList.add("current_user");
            }
            let content = document.createElement("div");
            content.classList.add("content");
            let adminName = document.createElement("p");
            adminName.innerHTML = oneMessgae["admin_name"];
            let msgtext = document.createElement("p");
            msgtext.innerHTML = oneMessgae["message"];
            content.append(adminName);
            content.append(msgtext);
            let avatar = document.createElement("div");
            avatar.classList.add("avatar");
            let img = document.createElement("img");
            img.setAttribute("src", oneMessgae["avatar"]);
            avatar.append(img);
            msg.append(content);
            msg.append(avatar);
            message.append(msg);
            messages.append(message);
            existMessages.push(oneMessgae["msg_id"]);
            message.scrollIntoView();
          }
        }
      }
    } else {
      console.log("no message found");
    }
  } catch (error) {
    console.error("Failed to load messages:", error);
  }
}
function exist(msg_id, existMessages) {
  return existMessages.some((msgId) => msg_id == msgId);
}
function sendMessage(e) {
  e.preventDefault();
  let form = new FormData(e.target);
  fetch("send_message.php", {
    method: "POST",
    body: form,
  })
    .then((response) => response.json())
    .then((result) => {
      if (result == "sent") {
        fetch("updateChNoti.php", {
          method: "POST",
          body: form,
        })
          .then((response2) => response2.json())
          .then((result2) => {
            if (result2 == "nope") {
              alert("server probleme");
            }
          });
      } else {
        console.log("nope");
      }
    });
  e.target.reset();
}
function enter(e) {
  if (e.key == "Enter") {
    e.preventDefault();
    document.getElementById("sendBtn").click();
  }
}
function showCreateChatroom() {
  let createChatroom_div = document.querySelector(".createChatroom");
  createChatroom_div.style.opacity = "1";
  createChatroom_div.style.visibility = "visible";
  createChatroom_div.style.transform = "scale(1) translate(-50%,-50%)";
  createChatroom_div.style.zIndex = "102";
}
function unshowCreateChatroom() {
  let createChatroom_div = document.querySelector(".createChatroom");
  createChatroom_div.style.opacity = "0";
  createChatroom_div.style.visibility = "hidden";
  createChatroom_div.style.transform = "scale(0.7) translate(-50%,-50%)";
  createChatroom_div.style.zIndex = "-1";
}
function createChatroom(e) {
  e.preventDefault();
  try {
    let form = new FormData(e.target);
    fetch("createCh.php", {
      method: "POST",
      body: form,
    })
      .then((response) => response.json())
      .then((result) => {
        if (result == "done") {
          unshowCreateChatroom();
          displayChatrooms();
        } else if (result == "error") {
          alert("error");
        }
      });
  } catch (error) {
    console.log(error);
  }
}
