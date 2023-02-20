@extends('master')
@section('content')
<div>
    <h2>CALCULATER</h2>
    <form action="" method="post">
        @csrf
        <input type="text"
            id="display"
            name="display"><br>
        <div>
            <div class="row">
                <div class="col-md">
                    <button type="button"
                        onClick="add_value('1')">1</button>&nbsp;
                    <button type="button"
                        onclick="add_value('2')">2</button>&nbsp;
                    <button type="button"
                        onclick="add_value('3')">3</button>&nbsp;
                    <button type="button"
                        onclick="add_opt('+')">Add</button>&nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <button type="button"
                        onclick="add_value('4')">4</button>&nbsp;
                    <button type="button"
                        onclick="add_value('5')">5</button>&nbsp;
                    <button type="button"
                        onclick="add_value('6')">6</button>&nbsp;
                    <button type="button"
                        onclick="add_opt('-')">Sub</button>&nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <button type="button"
                        onclick="add_value('7')">7</button>&nbsp;
                    <button type="button"
                        onclick="add_value('8')">8</button>&nbsp;
                    <button type="button"
                        onclick="add_value('9')">9</button>&nbsp;
                    <button type="button"
                        onclick="add_opt('*')">Mul</button>&nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <button type="button"
                        onclick="del_value()"><b>Del</b></button>&nbsp;
                    <button type="button"
                        onclick="add_value('0')">0</button>&nbsp;
                    <button type="button"
                        onclick="calculate_value();save_value()"><b>Equal</b></button>&nbsp;
                    <button type="button"
                        onclick="add_opt('/')">Div</button>&nbsp;
                </div>
            </div>
        </div>
    </form>
    <div class="list">
        <h4>Last Three Calculated list</h3>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>unique_id</th>
                        <th>Cal Value</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach($data as $value)
                        <tr>
                            <td class="sno">{{++$i}}</td>
                            <td>{{$value->id}}</td>
                            <td class="val">{{$value->calculated_value}}</td>
                            <td class="del"><button onclick="deletes({{$value->id}})">Del</button></td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
<script>
    // Calculated Value saved
    
    function save_value(){
    var calucalted_value = $('#display').val();
    if(calucalted_value !=0){
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
        $('#display').val(calucalted_value);
        }else{
        alert('Failed to add');
        }
        }
        });
        }
    }
    // Calculated Deleted from database
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
</script>
@endsection