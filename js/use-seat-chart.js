// 座席選択ライブラリを使用する為のjsファイル
//
// @author HIR0Y0SHI
// @version 1.0
// Created: 2016/12/15


// 選択された座席を格納する連想配列
var selectedList = {};
var firstSeatLabel = 1;

$(document).ready(function() {

  var $cart = $('#selected-seats'),
  $counter = $('#counter'),
  $total = $('#total'),
  sc = $('#seat-map').seatCharts({

    // 座席種類とレイアウトの指定
    map: [
      'ff_ff',
      'ff_ff',
      'ff_ff',
      'ff_ff',
      'ff___',
      'ff_ff',
      'ff_ff',
      'ff_ff',
      'fffff',
    ],
    seats: {
      f: {
        price   : 100,
        classes : 'first-class', //your custom CSS class
        category: 'First Class'
      }
    },
    naming : {
      top : false,
      getLabel : function (character, row, column) {
        return firstSeatLabel++;
      },
    },
    legend : {
      node : $('#legend'),

      // 座席の種類(状態)の指定
      items : [
        [ 'f', 'available',   '予約可能座席' ],
        [ 'f', 'unavailable', '予約不可座席']
      ]
    },
    click: function () {

      // 選択されている座席数を格納
      var selectedNum = Object.keys(selectedList).length;

      /*
      座席状態の判断
      */
      if (this.status() == 'available') {
        /* 選択可能状態 */

        // 座席数の制限
        if (selectedNum >= 6) {
          alert("席は６席まで選択できます。");

          // MEMO: 6席以上は選択できない為、状態を選択可能状態（available）で返す。
          return 'available';
        }

        //let's create a new <li> which we'll add to the cart items
        $('<li>'+this.data().category+' Seat # '+this.settings.label+': <b>$'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
        .attr('id', 'cart-item-'+this.settings.id)
        .data('seatId', this.settings.id)
        .appendTo($cart);

        // 追加
        selectedList[this.settings.id] = this.settings.id;

        /*
        * Lets update the counter and total
        *
        * .find function will not find the current seat, because it will change its stauts only after return
        * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
        */
        $counter.text(sc.find('selected').length+1);
        $total.text(recalculateTotal(sc)+this.data().price);


        console.log(selectedList);

        return 'selected';
      } else if (this.status() == 'selected') {
        /* 座席が選択されている状態 */

        //update the counter
        $counter.text(sc.find('selected').length-1);
        //and total
        $total.text(recalculateTotal(sc)-this.data().price);

        //remove the item from our cart
        $('#cart-item-'+this.settings.id).remove();



        // 削除
        delete selectedList[this.settings.id];

        console.log(selectedList);

        //seat has been vacated
        return 'available';
      } else if (this.status() == 'unavailable') {
        //seat has been already booked
        return 'unavailable';
      } else {
        return this.style();
      }


    }
  });

  //this will handle "[cancel]" link clicks
  $('#selected-seats').on('click', '.cancel-cart-item', function () {
    //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
    sc.get($(this).parents('li:first').data('seatId')).click();
  });

  //let's pretend some seats have already been booked
  // 選択不可座席の指定
  // sc.get(['1_2', '4_1', '7_1', '7_2']).status('unavailable');
  setUnavailable(sc, unavailable_seats);

});

function recalculateTotal(sc) {
  var total = 0;

  //basically find every selected seat and sum its price
  sc.find('selected').each(function () {
    total += this.data().price;
  });

  return total;
}



// Created by HIR0Y0SHI on 201612/15
// 選択不可な座席をセットする
// MEMO: ['1_2', '4_1', '7_1', '7_2']
function setUnavailable(sc, unavailableList) {
  sc.get(unavailableList).status('unavailable');
}


// Created by HIR0Y0SHI on 201612/15
// 選択された座席をJSONでphpへPOST送信する
function formSubmit() {
  var form = document.createElement('form');
  document.body.appendChild(form);

  var input = document.createElement('input');
  input.setAttribute('type', 'hidden');
  input.setAttribute('name', 'test_name');
  input.setAttribute('value', JSON.stringify(selectedList));

  form.appendChild(input);
  form.setAttribute('action', 'post_test.php');
  form.setAttribute('method', 'post');
  form.submit();
}
