@extends('../layouts.app')

    @section('content')
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('subject.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="Название">Название предмета</label>
                        <input name="subjectName" id="subjectName" class="form-control">
                    </div>
                    <div class="text-center">
                        <button class="btn btn=success">
                            Создать предмет
                        </button>
                    </div>
                </form>
            </div>
        </div>

    @endsection
