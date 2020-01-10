// resourcesのjsフォルダにusers.js っていう似た名前のファイルがあるので注意

// maru ファイル追加
// profile

let observers = [];
// 監視ターゲットの取得
//const target = document.getElementById('target')
let targetElm = document.querySelectorAll('.carousel-item');
const buttonElm = document.querySelector('.tinder-button-text');

for (let i = 0; i < targetElm.length; i++){   
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
    observers[i].observe(targetElm[i], {
        attributes: true
    })

}

