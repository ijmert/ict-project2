@extends('layouts.main')

@section('content')



<table class="responsiveTable">
<<<<<<< Updated upstream
    <tr>
        
    <form action="addSensor" method="post" >
             @csrf
             <td colspan="4"> <button>sensor toevoegen</button> </td>
    </form>
    </tr>
     <?php
     $counter = 0;
    for ($RowCounter = 1;$RowCounter <= 3 ;$RowCounter++){?>
    <tr>
        <?php
            for ($ColCounter = 1;$ColCounter <=4;$ColCounter++){?>
        <td>
            <table>
                <tr>
                    <td style="width: 75%">

    <form action="<?= 'studentCard'?>" method="post">
    <div class="card mx-auto" style="width: 400px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-auto">
                        E-mail adres :
                    </div>
                    <div class="col-md-auto">
                        <input type="text" name="accountEditFormEmail"
                               value="test">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-auto">
                        Voornaam :
                    </div>
                    <div class="col-md-auto">
                        <input type="text" name="accountEditFormFirstname"
                               value="test"><br>

                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-auto">
                        Achternaam : 
                    </div>
                    <div class="col-md-auto">
                        <input type="text" name="accountEditFormLastname"
                               value="test">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-auto">
                        wachtwoord : 
                    </div>
                    <div class="col-md-auto">
                        <input type="text" name="accountEditFormPasword"
                               value="test">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-auto">
                        herhaal wachtwoord : 
                    </div>
                    <div class="col-md-auto">
                        <input type="text" name="accountEditFormRepeatPasword"
                               value="test">
                    </div>
                </div>
               
                <div class ="row justify-content-around">
                    <div class="col-md-auto">
                        <button name="studentCardEditFormCancelBtn" type="submit" class="btn btn-danger" value="test">Cancel</button>
                    </div>
                    <div class="col-md-auto">
                        <button name="studentCardEditFormUpdateBtn" type="submit" class="btn btn-danger" value="test">Save</button>
                     </div>
                </div>
            </div>
        </div>
    </form>
    
</table>

@endsection