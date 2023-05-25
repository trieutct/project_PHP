const next=document.querySelector('.next');
const prev=document.querySelector('.prev');
const comment=document.querySelector('#list-comment');
const commentItem=document.querySelectorAll('#list-comment .item');
var translateY=0;
var count=commentItem.length;


console.log(next);
console.log(prev);
console.log(comment);
console.log(commentItem);
console.log(count);
prev.addEventListener('click',function (event)
{
    event.preventDefault()
    if(count==commentItem.length)
    {
        //xem het binh luan
        return false
    }
    translateY +=400
    comment.style.transform= `translateY(${translateY}px)`;
    count++;
});
next.addEventListener('click',function (event)
{
    event.preventDefault()
    if(count==1)
    {
        //xem het binh luan
        return false
    }
    translateY +=-400
    comment.style.transform= `translateY(${translateY}px)`;
    count--;
})




const user=document.querySelector('#actions .item a:nth-child(1)');
const user_ul=document.querySelector('#actions .item ul');
let check=0;
user.addEventListener('click',function (event)
{
    event.preventDefault();
    check++;
    if(check%2==1)
    {
        user_ul.style.display='block';
    }
    else
    {
        check=0;
        user_ul.style.display='none';
    }
});




