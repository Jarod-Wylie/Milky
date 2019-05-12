HOI


<form method="POST" action="{{ $systems->id }}">
    {{method_field ('PATCH')}}
    {{csrf_field()}}
    <div class="field">
        <div class ="label" for="title">Title</label>

        <div class="control">
            <input 
            class="form-control" type="text" class="input" name="name" placeholder="Name of System" value="{{ $systems->name }}">
            <input
            class="form-control" type="text" class="input" name="XCoordinate" placeholder="Name of System" value="{{ $systems->XCoordinate }}">
            <button type="submit">UPDATE</button>
        </div>
    </div>
</form> 

        <form method="POST" action="{{ $systems->id }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger control">Delete</button>
        </form>