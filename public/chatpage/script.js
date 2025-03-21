document.addEventListener("DOMContentLoaded", () => {
    const adminItems = document.querySelectorAll(".admin-item");
    const chatBody = document.getElementById("chat-body");
    const chatAdminName = document.getElementById("chat-admin-name");
    const messageInput = document.getElementById("message");
    const sendButton = document.getElementById("send-btn");

    let currentAdmin = "";

    // Pilih Admin
    adminItems.forEach(item => {
        item.addEventListener("click", () => {
            currentAdmin = item.getAttribute("data-admin");
            chatAdminName.textContent = currentAdmin;
            loadMessages(currentAdmin);
        });
    });

    // Load Pesan
    function loadMessages(admin) {
        fetch("process.php?admin=" + admin)
            .then(res => res.text())
            .then(data => chatBody.innerHTML = data);
    }

    // Kirim Pesan
    sendButton.addEventListener("click", () => {
        const message = messageInput.value.trim();
        if (message && currentAdmin) {
            fetch("process.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `admin=${currentAdmin}&message=${message}`
            }).then(() => {
                messageInput.value = "";
                loadMessages(currentAdmin);
            });
        }
    });
});