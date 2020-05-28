function submitFunc(e){
    var user_txt = document.getElementById("username");
    var pass_txt = document.getElementById("password");
    
    if (user_txt.value == '' || pass_txt.value == '') {
        e.preventDefault(); 
        errorigniter();
        
    }

}

//as we know dv_row_firstchild is not exactly the real first child but the first visible child 
// the real firstchild child is a text node.

function errorigniter(){
        var dv_row = document.getElementById("dv-row");
        var dv_row_firstchild = document.getElementById("dv-row-firstchild");
        console.log(dv_row.childNodes);
        if(!is_there_any_error_div(dv_row,dv_row_firstchild)){
            var dv_err = document.createElement('div');
            dv_err.setAttribute("class", "alert alert-info");
            dv_err.setAttribute("role", "alert");

            var but_err = document.createElement('button');
            but_err.setAttribute("type","button");
            but_err.setAttribute("class","close");
            but_err.setAttribute("data-dismiss","alert");
            but_err.setAttribute("aria-label","Close");
            
            var sp_err = document.createElement('span');
            sp_err.setAttribute("aria-hidden" , "true");
            sp_err.innerHTML = "&times;";

            var txt_err = document.createTextNode("لطفا نام کاربری و رمز عبور را وارد کرده و سپس دکمه ورود را کلیک کنید!");
           
            but_err.appendChild(sp_err);
            dv_err.appendChild(but_err);
            dv_err.appendChild(txt_err);
            
            dv_row.insertBefore(dv_err,dv_row_firstchild);
        }
        
}



function is_there_any_error_div(dv_row,dv_row_firstchild){
    if(dv_row.childNodes[2]==dv_row_firstchild){
        return true;
    }
}


function deleteFunc(elem){
    var jumbo = elem.parentNode.parentNode;
    var container = jumbo.parentNode;
    if(window.confirm("آیا از حذف پست اطمینان دارید؟")){
        // removing the post from the data base using fetch
        var input_id = elem.id.replace("submit","input");
        var post_id = document.getElementById(input_id).value;
        fetch('https://localhost/dashboard/PROJECTS/A-Simple-CMS/templates/modules/revision/deletepost.php',{
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({id:post_id})
        })
        .then(res=>res.text())
        .then(text=> delUI(text,container,jumbo));  
    }    
}

function delUI(text,container,jumbo){
    if(text){
        container.removeChild(jumbo);
    } 
    else{
        text = 'مشکلی در حذف پست پیش آمد!';
    }
    alert(text);
}



     
