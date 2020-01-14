@extends('layouts.app')
@section('content')
@push('css')
<link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
@endpush
<html>

<body>

    <nav class="nav">
        <ul>
            <li class="personIcon">
                <a href="/users/show/{{Auth::id()}}"><i class="fas fa-user fa-2x">{{Auth::id()}}</i></a>
                <p>{{Auth::id()}}</p>
            </li>

            <li class="appIcon"><a href="{{route('home')}}"><img src="/storage/images/techpit-match-icon.png"></a></li>
        </ul>
    </nav>
    <img src="/storage/images/{{Auth::user()->img_name}}" alt="user_icon">

    <div id="chat">

        <div v-for="m in messages">
            <span v-text="m.created_at"></span>：&nbsp;<!-- 登録された日時 -->
            <span v-text="m.body"></span><!-- メッセージ内容 -->
            <!-- <span v-text="m.user_id"></span> -->
            <span v-text="m.name"></span>
            <img :src="m.img_name" alt="">
        </div>

        <hr>
        <textarea v-model="message"></textarea>
        <br>
        <button type="button" @click="send()">送信</button>
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
                        message:  this.message,
                        user_id:  this.user_id,
                        name:     this.name,
                        img_name: this.img,
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
@endsection
