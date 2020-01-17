@extends('layouts.app')
@section('content')
@push('css')
<!-- <link href="{{ secure_asset('css/user.css') }}" rel="stylesheet"> -->
<link href="{{ secure_asset('css/chat.css') }}" rel="stylesheet">
@endpush
<html>

<body>
<br>

    <div id="chat">
        <div v-for="m in messages">
            <!-- <span v-text="m.created_at"></span>：&nbsp; -->
            <!-- 登録された日時 -->
            <!-- <span v-text="m.user_id"></span> -->
            <!-- メッセージ内容 -->

            <div class="balloon-set-box right" v-if="m.user_id == {{Auth::id()}}">
                <span class="balloon_right" v-text="m.body"></span>
                <!-- <span v-text="m.match_id"></span> -->
            </div>
            <!-- <span class="time_right" v-text="m.created_at"></span> -->
            <!-- 自分のメッセージ -->
            <div class="balloon-set-box left" v-else>
                <div class="icon-box">
                    <img :src="m.img_name" alt="img_icon" width="40px" height="40px" class="icon">
                </div>
                <span class="balloon_left" v-text="m.body"></span>
                <!-- <span v-text="m.match_id"></span> -->
                <!-- <span class="time_left" v-text="m.created_at"></span> -->
                <!-- 相手のメッセージ -->
            </div>
        </div>

            <div class="inputWithIcon">
                <input type="text" v-model="message" placeholder="メッセージを入力">
                <!-- <textarea v-model="message"></textarea> -->
                <i aria-hidden="true" @click="send()">送信</i>

            </div>
    </div>
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
                        message: this.message,
                        user_id: this.user_id,
                        name: this.name,
                        img_name: this.img,
                        match_id: this.match_id,
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function() {
            //ここに自分の処理を追加!
            const result = document.getElementsByClassName('span.furiwake');
            console.log(result[0]);
            console.log(result[1]);



        });
    </script>
</body>

</html>
@endsection
