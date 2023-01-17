$(document).ready(function(){
        $(".delete").click(function(){
            let message = confirm("Are you sure to delete?");
            if(message){
                let id = $(this).parent('td').attr('id');
                console.log(id);
                let tr = $(this).parent('td').parent('tr');
                $.ajax({
                    url:"delete_doctor.php",
                    type:'post',
                    data:{id:id},
                    success:function(response){
                        console.log(response)
                        if(response==='unsuccess'){
                            alert("You can't delete that row.");
                        }
                        else{
                            tr.fadeOut();
                        }
                    },
                    error:function(){
                        
                    }
                })
            }
        })
})