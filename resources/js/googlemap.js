/* 現在地取得 maru ------------------------------------------
 * リロードのたびに現在地を読み込む
/*----------------------------------------------------------*/

//getMyPlace();

function getMyPlace() {
    if (!navigator.geolocation) { //Geolocation apiがサポートされていない場合
        output.innerHTML = "<p>Geolocationはあなたのブラウザーでサポートされておりません</p>";
        return;
    }

    function success(position) {
        var latitude = position.coords.latitude; //緯度
        var longitude = position.coords.longitude; //経度
        console.log(latitude, longitude);
        // ここでajax通信してdbに現在地を書き込む？
    };

    function error() {
        //エラーの場合
        alert("座標位置を取得できません");
    };
    navigator.geolocation.getCurrentPosition(success, error); //成功と失敗を判断
}
