<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    

    <div class="container">
        <h1 class="mt-5">Testing Google Data & GIT</h1>

        <form action="/register" class="w-50" method="post">
          @csrf
            <div class="form-group pb-3">
                <label for="company">Nombre de tu empresa</label>
                <input type="text" name="company" id="company" class="form-control" value="{{old('company')}}">
            </div>
            <button tye="submit" class="btn btn-primary btn-sm">Seleccionar</button>

      
            @if ($results)
    @for ($i = 0; $i < $count; $i++)
        @foreach ($results as $result)
            <div class="row rounded shadow p-3 my-3">
                <div class="card-content d-flex gap-3">
                    @if ($result[$i]['photo'] != null)
                    <div class="img-company">
                      <img style="max-width: 100%; width: 80px; height: 80px; object-fit: cover;" src="{{$result[$i]['photo']}}" alt="">
                    </div>
                    @endif

                  <div class="info-company">
                    <h3><a target="_blank" href="{{$review_uri . $result[$i]['place_id']}}">{{$result[$i]['name']}}</a></h3>
                    <span>{{$result[$i]['full_address']}}</span>
                  </div>
            </div>
        @endforeach
    @endfor
@endif
        </form>
    </div>

    <div class="container mt-3">
      {{ dd($results) }}
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>