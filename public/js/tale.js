/**
 * Created by Юра on 11.07.2016.
 */

$(document).ready(function () {
    //alert ('Подключён, начинаю работу!')

    //-------- Удаление категории ---------------
    $('td > .cat_link').click(function (event) {
        event.preventDefault();

        var id = $(this).attr("href"); //Получить текст ссылки из таб. "categories"
        var href = 'cat/' + id; //Сформировать ссылку для AJAX
        var _parent = $(this).parent().parent();
        var token = $('#token-keeper').data("token"); //Строка таблицы <TR>

        confirm_var = confirm('Удалить категорию?'); //запрашиваем подтверждение на удаление
        if (!confirm_var) {
            return false;
        }

        $.ajax({
            url: href, //url куда мы передаем delete запрос
            method: "POST",
            data: {'_token': token, '_method': "DELETE"}, //не забываем передавать токен, или будет ошибка.

            success: function () {
                _parent.remove(); // удаляем строчку tr из таблицы
                console.log('Успешно! (delete)');
            },
            error: function () {
                console.log('Не то!');
            }
        });
    })


    //-------- Удаление группы ---------------
    $('td > .dig').click(function (event) {
        event.preventDefault();

        var id = $(this).attr("href"); //Получить текст ссылки из таб. "categories"
        var href = 'group/' + id; //Сформировать ссылку для AJAX
        var _parent = $(this).parent().parent(); //Получить предка (строка <TR>)
        //Получить ссылку на картинку (где лежит?)
        /*var previwe = $(this).parent().prev().prev().children('img').attr("src");
         alert(previwe);*/
        var token = $('#token-keeper_2').data("token");

        confirm_var = confirm('Удалить группу?'); //запрашиваем подтверждение на удаление
        if (!confirm_var) {
            return false;
        }

        $.ajax({
            url: href, //url куда мы передаем delete запрос
            method: "POST",
            data: {'_token': token, '_method': "DELETE"}, //не забываем передавать токен, или будет ошибка.

            success: function (msg) {
                _parent.remove(); // удаляем строчку tr из таблицы
                //alert('Группа удалена');
            },
            error: function (msg) {
                console.log(msg);
            } // в консоле  отображаем информацию об ошибки, если они есть

        });

    })
    //-------- Удаление товара ---------------
    $('td > .art_del').click(function (event) {
        event.preventDefault();
        //alert(9898);
        var id = $(this).attr("href"); //Получить текст ссылки из таб. "categories"
        var href = 'artic/' + id; //Сформировать ссылку для AJAX
        var _parent = $(this).parent().parent();
        var token = $('#token-keeper_3').data("token"); //Строка таблицы <TR>

        confirm_var = confirm('Удалить товар?'); //запрашиваем подтверждение на удаление
        if (!confirm_var) {
            return false;
        }

        $.ajax({
            url: href, //url куда мы передаем delete запрос
            method: "POST",
            data: {'_token': token, '_method': "DELETE"}, //не забываем передавать токен, или будет ошибка.

            success: function (msg) {
                _parent.remove(); // удаляем строчку tr из таблицы
                //alert('Группа удалена');
            },
            error: function (msg) {
                console.log(msg);
            } // в консоле  отображаем информацию об ошибки, если они есть

        });

    })

    //---------- Сумма товара --------------
    //При изменении поля INPUT менять поле "Сумма"
    $('td > input').change(function (event) {

        var kol = $(this).val(); //шт.
        var cena = $(this).parent().prev().text();    //цена товара.
        var summ = $(this).parent().next().text(kol * cena); //изменить сумму.
        var id = $(this).parent().siblings().eq(0).text(); //ID товара

        var token = $('#token-keeper_4').data("token");
        var href = '../count/' + id + '/' + kol; //Сформировать ссылку.

        $.ajax({
            type: "POST",
            url: href,
            data: {id: 'id', kol: 'kol', '_token': token, '_method': "POST"},

            success: function () {
                console.log('Успешно! (shange)')
            },

            error: function () {
                console.log(msg)
            } // в консоле  отображаем информацию об ошибке


        })

        calc_summ();//Вывести сумму выбранного товара.
    })

//---------- Подсчёт суммы при загрузке ---------------
    $('table').ready(function () {
        calc_row(); //Вывести сумму по строке
        calc_summ();//Вывести общую сумму
    });


    //---------- Подсчёт суммы в строке ---------------
    //Здесь используется цикл ".each"
    function calc_row() {
        $('td > input').each(function (indx, element) {
            var kol = $(element).val(); //шт.
            var cena = $(element).parent().prev().text();    //цена товара.
            var summ = $(element).parent().next().text(kol * parseInt(cena)); //изменить сумму.
        })
    }

    //---------- Подсчёт и вывод суммы выбранного товара --------------
    function calc_summ() {

        var sus = [];  // переменная, которая будет хранить содержимое ячеек с ценой (с учётом кол.)

        $('.summ_row').each(function (indx, element) { //записать в массив.
            sus.push(parseInt($(element).text()));  //переведя в чифру.
        });


        //Используя цикл "reduce" подсчитать сумму по столбцу "Сумма".
        var result = sus.reduce(function (sum, current) {
            return sum + current;
        }, 0);
        $('#price_summ').html(result); //Вывести результат.
        //alert( result );
    }


    //------------- Удаление товара из корзины ----------------------
    $('td > .cart_delete').click(function (event) {

        var id = $(this).attr("onclick"); //Получить ID товара.
        var _parent = $(this).parent().parent();
        var href = '../del/' + id; //Сформировать ссылку для AJAX
        var token = $('#token-keeper_4').data("token");

        confirm_var = confirm('Удалить товар?'); //запрашиваем подтверждение на удаление
        if (!confirm_var) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: href,
            data: {id: 'id', '_token': token, '_method': "POST"},

            success: function () {

                var len = $('#token-keeper_4 tr').size();
                if (len == 2) {
                    window.location.href = "javascript:history.back()"
                }
                else {
                    _parent.remove(); // удаляем строчку tr из таблицы
                    calc_summ();//Вывести общую сумму
                }
                console.log('Успешно! (delete)');
            },
            error: function () {
                console.log(msg);
            } // в консоле  отображаем информацию об ошибки, если они есть

        });

    })


    //------------- Выделение пункта меню "Категории" ----------------------
    $('div.summ').ready(function () {
        var str_cat = $('.cat_cap p').text(); //получить имя выбранной категории
        if (str_cat.length > 0)   //проверить чтобы не пустой.
        {
            $('li:contains("' + str_cat + '")').addClass('active_cat'); //изменить фон пункта меню.

        }
    })

    //------------- Удаление заказа из списка ----------------------
    $('.list_order_delete').click(function (event) {

        var id = $(this).attr("onclick"); //Получить ID товара.
        var _parent = $(this).parent().parent();
        var href = 'list/' + id; //Сформировать ссылку для AJAX
        var token = $('#token-keeper_9').data("token");

        confirm_var = confirm('Удалить заказ?'); //запрашиваем подтверждение на удаление
        if (!confirm_var) {
            return false;
        }

        $.ajax({
            url: href, //url куда мы передаем delete запрос
            method: "POST",
            data: {'_token': token, '_method': "DELETE"}, //не забываем передавать токен, или будет ошибка.

            success: function (msg) {
                _parent.remove(); // удаляем строчку tr из таблицы
                console.log('Успешно! (delete)');
            },
            error: function () {
                console.log('Не получилось...! (delete)')
            }
        });

    })

  /*  //------------- Сортировка по категории в articles ----------------------
    $('#select_cat').change(function (event) {
       
        var id = $(this).val(); //код из списка select
        var href = '/admin/articles/' + id; //адрес контроллера.
        var path = location.pathname;

        alert(path);
        if($(this).val() == '9097') {
            $(location).attr('href', 'articles/');
        }

        else{

            $(location).attr('href', path + id);
        }


    })

   */





})

