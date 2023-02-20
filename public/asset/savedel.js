
    function save_values(){
        var calucalted_value = $('#display').val();
            $.ajax({
                type: "POST",
                url: "{{route('save')}}",
                data: {
                "_token": "{{ csrf_token() }}",
                'calculated_value':calucalted_value,
                },
                success: function(data){
                if(data == '001'){
                location.reload();
                }else{
                alert('Failed to add');
                }
            }
        });
    }
    function deletes(id){
         $.ajax({
                type: "POST",
                url: "{{route('delete')}}",
                data: {
                "_token": "{{ csrf_token() }}",
                'id':id,
                },
                success: function(data){
                    if(data == '001'){
                    location.reload();
                    }else{
                    alert('Failed to delete');
                    }
                }
        });
    }
