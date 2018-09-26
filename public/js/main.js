// あくまでも、aタグリンク押下からformタグの送信へ繋げるjs
// その間、確認ダイアログを表示させる。

(function() {
  'use strict';
    // 厳密なエラーチェックをすることが推奨されている為、記述。

  var cmds = document.getElementsByClassName('del');
    // class属性を指定して要素を取得する。返り値は配列。
  var i;

  for (i = 0; i < cmds.length; i++) {
    // 配列全てを取り出す。
    cmds[i].addEventListener('click', function(e) {
      // クリックされたi番目の要素の送信を中断。
      // 「addEventListener()」：第一引数のイベントが実行された場合に、第二引数の処理を実行（処理は{〜}内に記載。
      e.preventDefault();
      // e.preventDefault()を記述する事で、デフォルトのイベントをキャンセルできる。（引数にeが渡されないと、処理内のpreventは動かない。）
      // e：イベントオブジェクト。targetやkeyCodeなどのプロパティを使うことでイベントの発生元の要素や押されたキーの情報などが入る。
      // ＝＝この場合、デフォのイベをキャンセルする必要が無いかも。

      if (confirm('are you sure?')) {
        // 確認ダイアログを表示させる（confirm）
        // ok押下ならtrue、ng押下ならfalseが返される。

        // document.getElementById('form_' + this.dataset.id).submit();
        // 上記を細分化
        var obtain = document.getElementById('form_' + this.dataset.id);
        console.log(obtain);
          // formのDOMが取得される。
        obtain.submit();
          // フォームが送信される。

          // 『〜〜ById()』；属性値が引数のidの要素を取得する。
          // 『this』：クリックされた要素そのもの。
          // 『.dataset.id』：要素のdata-id属性の属性値を取得。
            // 『.dataset.xxx』：data-xxx属性の属性値を取得。
              // 『〜.dataset』：『zzz』部分とそれに対応する属性値を取得（zzz:属性値）
              // 『zzz』は要素〜の『data-zzz』部分。指定がない時は全てのペアを取得。
      }
    });
  }

})();
