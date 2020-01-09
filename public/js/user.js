
// profile

let observers = [];
// 監視ターゲットの取得
//const target = document.getElementById('target')
let target = document.querySelectorAll('.carousel-item');
const buttonElm = document.querySelector('.tinder-button-text')

for (let i = 0; i < target.length; i++){   
    // オブザーバーの作成
    observers[i] = new MutationObserver(records => {
        // 変化が発生したときの処理を記述
        //console.log('change' + i);
        let active = document.querySelector('.active');
        let childnode = active.children;
        let text = childnode[0].textContent;
        console.log(text);
        buttonElm.innerText = text;
    });

    // 監視の開始
    observers[i].observe(target[i], {
        attributes: true
    })

}

// profileEdit
//document.querySelector('.file-upload').file_upload();
//$('.file-upload').file_upload();

// setting

// let app = new Vue({
//     el: '#app',
//     components: {
//         'vueSlider': VueSlider,
//     },
//     data: {
//         divWidth: 100,
//         value1: 2,
//         value2: [18, 30]
//     },
//     computed: {
//         getWidth: function () {
//             return this.value1;
//         }
//     }
// });