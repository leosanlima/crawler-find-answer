<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Desafio Crawly - Encontrando Resposta</title>
</head>
<body>
    <div class="container">
        <h2>Desafio Crawly</h2>
        <p>Clique no botão para encontrar a responsta da página <a href="http://applicant-test.us-east-1.elasticbeanstalk.com/">http://applicant-test.us-east-1.elasticbeanstalk.com/</a></p>
        <button type="button" class="btn btn-primary btn-lg" id="findAnswer" >

            Encontar Resposta

            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span>
        </button>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Resposta</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
</body>
<script  type="text/javascript">
$(function () {
    var counter = 0;
    $('#spinner').hide();

    $("#findAnswer").on("click", function (event) {
        //event.preventDefault();

        var $this = $(this);
        $this.button('loading');

        var newRow = $("<tr>");
        var cols = '';

        $.ajax({
                url: "{{ route('doFindAnswer') }}",
                beforeSend: function () {
                    $('#spinner').show();
                }
            })
            .done(function(data) {
                cols += '<th scrope="row">' + counter + '</th>';
                cols += '<td>'+data.answer+'</td>';
                cols += '<td>'+data.status+'</td>';
                newRow.append(cols);
                $("table").append(newRow);
            })
            .fail(function() {
                cols += '<th scrope="row">' + counter + '</th>';
                cols += '<td>-</td>';
                cols += '<td>Erro</td>';
                newRow.append(cols);
                 $("table").append(newRow);
            })
            .always(function (){
                $('#spinner').hide();
            })
            counter++;
    });
});

</script>
</html>

