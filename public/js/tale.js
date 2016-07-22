/**
 * Created by Юра on 11.07.2016.
 */

$(document).ready(function() {
    //alert ('Подключён, начинаю работу!')

    //-------- Удаление категории ---------------
    $('td > .cat_link').click(function (event) {
        event.preventDefault();

        var id = $(this).attr("href"); //Получить текст ссылки из таб. "categories"
        var href = 'cat/'+id; //Сформировать ссылку для AJAX
        var _parent = $(this).parent().parent();
        var token = $('#token-keeper').data("token"); //Строка таблицы <TR>

        confirm_var = confirm('Удалить категорию?'); //запрашиваем подтверждение на удаление
        if (!confirm_var) {
            return false;
        }

        $.ajax({
            url:href, //url куда мы передаем delete запрос
            method: "POST",
            data: {'_token': token, '_method': "DELETE" }, //не забываем передавать токен, или будет ошибка.

            success: function(msg){
                _parent.remove(); // удаляем строчку tr из таблицы
                //alert('Категория удалена');
            },
                error: function(msg)
            {
                console.log(msg); // в консоле  отображаем информацию об ошибки, если они есть
            }
        });
    })


        //-------- Удаление группы ---------------
        $('td > .dig').click(function (event) {
            event.preventDefault();
            //alert(11111111);
            var id = $(this).attr("href"); //Получить текст ссылки из таб. "categories"
            var href = 'group/'+id; //Сформировать ссылку для AJAX
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
                url:href, //url куда мы передаем delete запрос
                method: "POST",
                data: {'_token': token, '_method': "DELETE" }, //не забываем передавать токен, или будет ошибка.

                success: function(msg)
                    {
                        _parent.remove(); // удаляем строчку tr из таблицы
                        //alert('Группа удалена');
                    },
                error: function(msg)
                {console.log(msg);} // в консоле  отображаем информацию об ошибки, если они есть

            });

        })
    //-------- Удаление товара ---------------
    $('td > .art_del').click(function (event) {
        event.preventDefault();
        alert(9898);
        var id = $(this).attr("href"); //Получить текст ссылки из таб. "categories"
        var href = 'artic/'+id; //Сформировать ссылку для AJAX
        var _parent = $(this).parent().parent();
        var token = $('#token-keeper_3').data("token"); //Строка таблицы <TR>

        confirm_var = confirm('Удалить товар?'); //запрашиваем подтверждение на удаление
        if (!confirm_var) {
            return false;
        }

        $.ajax({
            url:href, //url куда мы передаем delete запрос
            method: "POST",
            data: {'_token': token, '_method': "DELETE" }, //не забываем передавать токен, или будет ошибка.

            success: function(msg)
            {
                _parent.remove(); // удаляем строчку tr из таблицы
                //alert('Группа удалена');
            },
            error: function(msg)
            {console.log(msg);} // в консоле  отображаем информацию об ошибки, если они есть

        });

    })   
    
    
    

})

