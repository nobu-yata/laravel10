import './bootstrap';
import $ from "jquery";

$(function () {
    $('[id=del-btn]').on("click", function (){
        if(!confirm('削除してもよろしいですか？')){
            return false;
        }
    });
});