document.addEventListener('DOMContentLoaded', function () {
    const communityLinks = document.querySelectorAll('.community-link');
    const messageContainer = document.querySelector('.tork');
    const form = document.querySelector('.text form');
    const textarea = document.querySelector('.text textarea');
    const communityIdInput = document.getElementById('community_id');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Debugging: Check if the elements exist
    if (!textarea) {
        console.error('Textarea element not found');
    }

    if (!form) {
        console.error('Form element not found');
    }

    if (!communityIdInput) {
        console.error('Community ID input element not found');
    }

    if (!csrfToken) {
        console.error('CSRF token not found');
    }

    communityLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const communityId = this.dataset.communityId;

            // Debugging: Log the communityId
            console.log('Clicked Community ID:', communityId);

            // コミュニティIDをフォームに設定
            communityIdInput.value = communityId;

            // 既存の選択状態をクリア
            communityLinks.forEach(link => link.classList.remove('active'));

            // クリックしたリンクをアクティブにする
            this.classList.add('active');

            fetchMessages(communityId);
        });
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const communityId = communityIdInput.value;
        const content = textarea.value;  // テキストエリアの値を取得

        // Debugging: Check if communityId and content are correct
        console.log('Submitting Message to Community ID:', communityId);
        console.log('Message Content:', content);

        // Debugging: Check if content is not null or empty
        if (!content) {
            console.error('Content is empty');
            return;
        }

        if (!communityId) {
            console.error('Community ID is not set');
            return;
        }

        postMessage(communityId, content);
    });

    function fetchMessages(communityId) {
        fetch(`/communities/${communityId}/messages`)
            .then(response => response.json())
            .then(messages => {
                messageContainer.innerHTML = '';
                messages.forEach(message => {
                    const messageDiv = document.createElement('div');
                    messageDiv.classList.add('message');
                    messageDiv.innerHTML = `<p>${message.user.name}: ${message.content}</p>`;
                    messageContainer.appendChild(messageDiv);
                });
            })
            .catch(error => {
                console.error('Error fetching messages:', error);
            });
    }

    function postMessage(communityId, content) {
        fetch(`/communities/${communityId}/messages`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ content })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(newMessage => {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message');
            messageDiv.innerHTML = `<p>${newMessage.user.name}: ${newMessage.content}</p>`;
            messageContainer.appendChild(messageDiv);
            textarea.value = '';  // 送信後にテキストエリアをクリア
        })
        .catch(error => {
            console.error('Error posting message:', error);
        });
    }
});
