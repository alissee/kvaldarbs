
@extends('main')


@section('titleofpage')
    Sazinies
@endsection

@section('cssfile')
    <link rel="stylesheet" href="/css/main.css">
@endsection


@section('content')

        <div class="row">
            <div class="col-md-12">
            <form action="/action_page.php">
            <hr>

            <h2> Sazinies ar mums! </h2>
            <p> Ieteikumi? Jautājumi? Droši raksti šeit! :) </p>
            <hr>

            <div class="form-group">
            <label name="contactUsName">Vārds:</label>
            <input name="contactUsName" class="form-control" id="contactUsName">
            </div>

            <div class="form-group">
            <label name="email">E-pasts:</label>
            <input name="email" type="email" class="form-control" id="contactUsEmail">
                <small id="emailHelp" class="form-text text-muted">E-pasts ir nepieciešams tikai tad, ja vēlaties, lai mēs ar Jums sazinamies</small>
             </div>

            <div class="form-group">
            <label name="contactUsSubject">Tēma:</label>
            <input name="contactUsSubject" class="form-control" id="contactUsSubject" required>
            </div>

            <div class="form-group">
            <label name="contactUsMessage">Ziņojums:</label>
            <textarea name="contactUsMessage" class="form-control" id="contactUsMessage" required></textarea>
            </div>

            <input type="submit" value="Iesniegt" class="btn btn-outline-success">

            </form>

            </div><!-- end of col-md-12 -->
        </div><!-- end of row -->
@endsection