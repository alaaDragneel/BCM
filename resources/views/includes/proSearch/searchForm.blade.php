
    <form action="#" method="post">
        <input type="text" class="form-control searchBox" name="search" placeholder="Search for the Partners " id="search" required autocomplete="off">
    </form>
    <div class="back">
         <span class="btn btn-danger">&times;</span>
         <div class="results searchAjax"></div>
    </div>

<script>
var url = '{{ route('results') }}';
var urlBtn = '{{ route('request') }}';
var token = '{{ csrf_field() }}';
</script>
