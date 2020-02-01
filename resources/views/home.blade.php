@extends('layouts.app')

@section('content')


<script type="text/javascript">
$(document).ready(function(){
    //gives feedback if sending amount is bigger than balance
    $("#amount").keyup(function(){

        if($("#amount").val() > {{ $user->balance }}){
            $('#send_submit').prop('disabled', true);
            $('#amount_feedback').show();
        }
        else{
            $('#send_submit').prop('disabled', false);
            $('#amount_feedback').hide();
        }
    });

    //gives feedback if account number is not existing
    $("#account_number").keyup(function(){
        $.ajax({
            type: "GET",
            url: "/validation?accnumber="+$("#account_number").val(),     
            success: function(result){
                if(!result.found){
                    $('#send_submit').prop('disabled', true);
                    $('#account_number_feedback').show();
                }  
                else{
                    $('#send_submit').prop('disabled', false);
                    $('#account_number_feedback').hide();
                }
            }
        });
    });
});
</script>


<!--------------------------------------------------- Modal for sending money FORM ------------------------------------------------------------>
    {!! Form::open(['action' => 'TransferController@makeTransfer', 'method' => 'POST']) !!}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-coins"></i> Make money transfer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    {{Form::label('account_number', 'Account number')}}
                    {{Form::text('account_number', '', ['class' => 'form-control','id' => 'account_number', 'placeholder' => 'Account number of user that you are sending for', 'maxlength' => 15,'required' => 'required'])}}
                    <div class="invalid-feedback" id="account_number_feedback" style="display: none;">
                        This account number not exist.
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('purpose', 'Purpose')}}
                    {{Form::text('purpose', '', ['class' => 'form-control', 'placeholder' => 'Why you are sending the money?', 'maxlength' => 30,'required' => 'required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('amount', 'Amount')}}
                    {{Form::text('amount', '', ['class' => 'form-control', 'id' => 'amount', 'placeholder' => 'How much?','required' => 'required'])}}
                    
                    <div class="invalid-feedback" id="amount_feedback" style="display: none;">
                        You definitely don't want to go negative.
                    </div>
                </div>


            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            {{Form::button('Send money <i class="far fa-paper-plane"></i>', ['type' => 'submit', 'id' => 'send_submit', 'class'=>'btn btn-primary'])}}

            </div>
        </div>
        </div>
    </div>
    {!! Form::close() !!}

<!-------------------------------------------------------------- Modal END -------------------------------------------------------------->




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    
                    <!---------------Successful and Error messages------------------>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <!------------------------------------Main info about account----------------------------------->
                    <h5> Hey, {{ $user->name }}! </h5>
                    <h6 class="mt-4"> Your balance: {{ number_format($user->balance, 2, '.', ',') }} <i class="fas fa-euro-sign"></i> </h6>
                    <p> Your account number: {{ $user->account_number }} </p>

                    

                    <!------------------------------------------Check all transfers buttons----------------------------------------->
                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="button" class="btn btn-success m-1 float-left" data-toggle="collapse" data-target="#transfersIn" aria-expanded="false" aria-controls="transfersIn">
                                <i class="fas fa-sign-in-alt"></i>  Transfers in <span class="badge badge-light">{{ count($transfersin) }}</span>
                            </button>
                            <button type="button" class="btn btn-danger m-1 float-left"  data-toggle="collapse" data-target="#transfersOut" aria-expanded="false" aria-controls="transfersOut">
                                <i class="fas fa-sign-out-alt"></i> Transfers out <span class="badge badge-light">{{ count($transfersout) }}</span>
                            </button>
                        </div>
                    </div>

                    <!------------------------------------------Make a Transfer button----------------------------------------->
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#exampleModal">
                                Make a transfer <i class="far fa-paper-plane"></i> 
                            </button>
                        </div>
                    </div>



                    <div class="accordion" id="accordion">
                        
                        <!-----------------------------Collapse box for Transfers IN---------------------------------------->
                        <div class="collapse" id="transfersIn" data-parent="#accordion">
                            <p class="h4 text-center mt-2">Transfers In</p>

                            <hr>

                            @if(count($transfersin) > 0)

                                @php $pagein = 1; @endphp
                                @for ($j = 0; $j < count($transfersin); $j)
                                    @if($j == 0)
                                        <div id="in_{{ $pagein }}" class="row mt-3"> 
                                    @else
                                        <div id="in_{{ $pagein }}" class="row mt-3" style="display:none;"> 
                                    @endif
                                            @for ($i = 0; $i < 4; $i++)
                                                @php if(!isset($transfersin[$j])) break; @endphp
                                                <div class="col-6 mt-3">
                                                    <ul class="list-group">
                                                        <li class="list-group-item active"> <b>By:</b> {{ $transfersin[$j]->from_user->name }}</li>
                                                        <li class="list-group-item"> <b>Purpose:</b> {{ $transfersin[$j]->purpose }}</li>
                                                        <li class="list-group-item">{{ number_format($transfersin[$j]->amount, 2, '.', ',') }} <i class="fas fa-euro-sign"></i></li>
                                                        <li class="list-group-item"><i class="fas fa-calendar-day"></i> {{ $transfersin[$j]->created_at }} </li>
                                                    </ul>
                                                </div>
                                                @php $j++; @endphp
                                            @endfor
                                        @php $pagein++; @endphp
                                    </div>
                                @endfor


                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="btn-group mt-4" role="group" aria-label="Basic example">
                                            <button type="button" id="down_in" class="btn btn-primary"><i class="fas fa-chevron-left"></i></button>
                                            <button type="button" id="page_in" class="btn btn-primary" disabled></button>
                                            <button type="button" id="up_in" class="btn btn-primary"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <p class="h5 text-center text-muted"> There is no data... </p>
                            @endif
                                
                        </div>

                        <!-----------------------------Collapse box for Transfers OUT---------------------------------------->
                        <div class="collapse" id="transfersOut" data-parent="#accordion">
                            <p class="h4 text-center mt-2">Transfers Out</p>
                            
                            <hr>

                            @if(count($transfersout) > 0)

                                @php $pageout = 1; @endphp
                                @for ($j = 0; $j < count($transfersout); $j)
                                    @if($j == 0)
                                        <div id="out_{{ $pageout }}" class="row mt-3"> 
                                    @else
                                        <div id="out_{{ $pageout }}" class="row mt-3" style="display:none;"> 
                                    @endif
                                            @for ($i = 0; $i < 4; $i++)
                                                @php if(!isset($transfersout[$j])) break; @endphp
                                                <div class="col-6 mt-3">
                                                    <ul class="list-group">
                                                        <li class="list-group-item active"> <b>By:</b> {{ $transfersout[$j]->from_user->name }}</li>
                                                        <li class="list-group-item"> <b>Purpose:</b> {{ $transfersout[$j]->purpose }}</li>
                                                        <li class="list-group-item">{{ number_format($transfersout[$j]->amount, 2, '.', ',') }} <i class="fas fa-euro-sign"></i></li>
                                                        <li class="list-group-item"><i class="fas fa-calendar-day"></i> {{ $transfersout[$j]->created_at }} </li>
                                                    </ul>
                                                </div>
                                                @php $j++; @endphp
                                            @endfor
                                        @php $pageout++; @endphp
                                    </div>
                                @endfor


                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="btn-group mt-4" role="group" aria-label="Basic example">
                                            <button type="button" id="down_out" class="btn btn-primary"><i class="fas fa-chevron-left"></i></button>
                                            <button type="button" id="page_out" class="btn btn-primary" disabled></button>
                                            <button type="button" id="up_out" class="btn btn-primary"><i class="fas fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <p class="h5 text-center text-muted"> There is no data... </p>
                            @endif

                        </div>
                    </div>




                    
                </div>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
