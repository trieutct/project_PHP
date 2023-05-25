const modul=document.querySelector('.header .user a');
let check=0;
const modul_ul=document.querySelector('.header .user .modul ul');
console.log(modul);
modul.addEventListener('click',function(event){
    event.preventDefault();
    check++;
    if(check%2==1)
    {
        modul_ul.style.display='block';
    }
    else{
        modul_ul.style.display='none';
    check==0;   
    }
})







const menu=document.querySelector('.header i');
const sidebar_left=document.querySelector('.sidebar-left');
const sidebar_right=document.querySelector('.sidebar-right');
let check_sidebar=0;
menu.addEventListener('click',function(e){
    e.preventDefault();
    check_sidebar++;
    if(check_sidebar%2==1)
    {
        sidebar_left.style.width='0';
        sidebar_right.style.width='100%';
    }
    else
    {
        sidebar_right.style.width='85%';
        sidebar_left.style.width='15%';
        check_sidebar==0;
    }
})







