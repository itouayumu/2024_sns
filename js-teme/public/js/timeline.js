document.addEventListener('DOMContentLoaded', function() {
    const timelineContainer = document.querySelector('.timeline');

    function fetchLatestPosts() {
        console.log('Fetching latest posts...');
        fetch('/posts/latest', { cache: "no-cache" })
            .then(response => response.json())
            .then(posts => {
                console.log('Posts fetched successfully');
                updateTimeline(posts);
            })
            .catch(error => console.error('Error fetching latest posts:', error));
    }

    function updateTimeline(posts) {
        let postsHtml = '';

        if (posts.length === 0) {
            postsHtml = '<p>ポストがありません投稿してみましょう</p>';
        } else {
            posts.forEach(post => {
                const userIcon = post.user_info && post.user_info.icon ? '/storage/images/' + post.user_info.icon : '';
                const postImg = post.img ? '/storage/images/' + post.img : '';

                postsHtml += `
                    <div class="post">
                        <div class="user-info">
                            <img src="${userIcon}" alt="ユーザー画像" class="user_icon" width="32" height="26">
                            <div>
                                <span class="username">${post.user ? post.user.name : 'Unknown User'}</span>
                                <span class="user-id">${post.user_info ? post.user_info.users_id : 'Unknown ID'}</span>
                            </div>
                            <span class="post-date">${post.created_at}</span>
                        </div>
                        <div class="post-content">
                            <p>${post.content}</p>
                            <img src="${postImg}" class="topimg">
                        </div>
                    </div>
                `;
            });
        }

        timelineContainer.innerHTML = postsHtml;
    }

    // Fetch latest posts every 1 second
    setInterval(fetchLatestPosts, 10000);
});
