<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="my-3">
        <button type="button" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#taskCreateModal">タスクを追加</button>
    </div>

    <div class="task-view m-auto">
        <ul class="list-group">
            @foreach($tasks as $task)
                <task-view
                    :task="{{ ($task) }}"
                    endpoint="{{ route('tasks.destroy', ['task' => $task]) }}"
                >
                </task-view>
            @endforeach

        </ul>
    </div>
</main>

<!--- タスク作成モーダル -->
<div class="modal fade" id="taskCreateModal" tabindex="-1" role="dialog" aria-labelledby="taskCreateModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskCreateModalTitle">タスク作成</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="taskCreateForm" method="POST" action="{{ route('tasks.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="TaskInput">タスク名</label>
                        <input type="text" class="form-control" id="TaskInput" name="title" placeholder="タスク名を入力してください" value="{{ old('title') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="taskPicker">期限日時</label>
                        <div class="input-group date" id="taskPicker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="limit_at" placeholder="期限日時を入力してください" data-target="#taskPicker" required>
                            <div class="input-group-append" data-target="#taskPicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taskProjectSelect">プロジェクトを選択</label>
                        <select class="form-control" id="taskProjectSelect" name="project_id">
                            <option value="">インボックス</option><!-- nullにするため、空文字を指定 -->
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <button form="taskCreateForm" type="submit" class="btn btn-primary">作成</button>
            </div>
        </div>
    </div>
</div>
