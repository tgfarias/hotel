$(function(){
    $('#tabs').tabs();
                
    //hover states on the static widgets
    $('ul#menu_topo li, ul#menu_lateral li, table#grid tbody tr').hover(
        function() {
            $(this).addClass('ui-state-hover');
        },
        function() {
            $(this).removeClass('ui-state-hover');
        }
        );
                    
    $(".botao").button();
                
    $("#mensagem_sistema").click(function(){
        $(this).slideUp();
    });
    
    //$( ".selector" ).datepicker({ dayNames: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"] });

    
    $(".data").datepicker({
        dayNames: ["Domingo","Segunda-feira","Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"],
        dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"], 
        monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        dateFormat: "dd/mm/yy"
    });
                
});

function apagar() {
    if(confirm('Esta opcao nao podera ser desfeita,\ntem certeza que deseja proseguir ?'))
        return true;
    else return false;
}