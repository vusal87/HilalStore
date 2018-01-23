
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */
var Jquery = $;

$('.mehsul-azalt, .mehsul-artir').click(function () {

   var id = $(this).attr('data-id');
   var eded = $(this).attr('data-eded');
    Jquery.ajax({
        type:'PATCH',
        url:'/sebet/guncelle/' +id,
        data:{eded:eded},
        success:function () {
             window.location.href='/sebet';
        // document.getElementById(id).innerHTML=data.eded;
        //     $(_this).attr('data-eded', parseInt(eded) + 1 )
        }
    });
});
