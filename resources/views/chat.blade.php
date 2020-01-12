<html>

<body>
    <div id="chat">
        <textarea v-model="message"></textarea>
        <br>
        <button type="button" @click="send()">送信</button>
        <hr>

        <div v-for="m in messages">
            <span v-text="m.created_at"></span>：&nbsp;
            <!-- 登録された日時 -->
            <span v-text="m.body"></span><!-- メッセージ内容 -->
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
    <script src="/js/app.js"></script>

    <script>
        new Vue({
            el: '#chat',
            data: {
                message: '',
                messages: []
            },
            methods: {
                getMessages() {
                    const url = '/ajax/chat';
                    axios.get(url)
                        .then((response) => {
                            this.messages = response.data;
                        });
                },

                send() {

                    const url = '/ajax/chat';
                    const params = {
                        message: this.message
                    };
                    console.log(params);
                    axios.post(url, params)
                        .then((response) => {
                            // 成功したらメッセージをクリア
                            this.message = '';
                        });
                }
            },
            mounted() {
                this.getMessages();
                Echo.channel('chat')
                    .listen('MessageCreated', (e) => {
                        this.getMessages(); // メッセージを再読込
                    });
            }
        });
    </script>
</body>

</html>
