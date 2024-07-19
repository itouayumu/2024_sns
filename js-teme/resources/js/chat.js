document.addEventListener('DOMContentLoaded', function () {
    const communityLinks = document.querySelectorAll('.community-link');
    const messageContainer = document.querySelector('.tork');
    const form = document.querySelector('.text form');
    const textarea = document.querySelector('.text textarea');
    const communityIdInput = document.getElementById('community_id');

    communityLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const communityId = this.dataset.communityId;

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
        postMessage(communityId, textarea.value);
    });

    function fetchMessages(communityId) {
        fetch(`/communities/${communityId}/messages`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
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
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
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
                textarea.value = '';
            })
            .catch(error => {
                console.error('Error posting message:', error);
            });
    }
});
