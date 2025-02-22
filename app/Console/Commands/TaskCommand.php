<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class TaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task {action} {description?} {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task management CLI';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->argument('action');

        match ($action) {
            'add' => $this->addTask(),
            'update' => $this->updateTask(),
            'delete' => $this->deleteTask(),
            'mark-in-progress' => $this->updateStatus('in-progress'),
            'mark-done' => $this->updateStatus('done'),
            'list' => $this->listTasks(),
            default => $this->error('Unknown action')
        };
    }

    private function addTask()
    {
        $description = $this->argument('description');
        if (!$description) {
            $this->error('Description is required!');
            return;
        }
        Task::create(['description' => $description]);
        $this->info("Task added: $description");
    }

    private function updateTask()
    {
        $id = $this->option('id');
        $description = $this->argument('description');

        if (!$id || !$description) {
            $this->error('ID and new description are required!');
            return;
        }

        $task = Task::find($id);
        if (!$task) {
            $this->error('Task not found!');
            return;
        }

        $task->update(['description' => $description]);
        $this->info("Task updated: $description");
    }

    private function deleteTask()
    {
        $id = $this->option('id');
        if (!$id) {
            $this->error('ID is required!');
            return;
        }

        Task::destroy($id);
        $this->info("Task deleted (ID: $id)");
    }

    private function updateStatus($status)
    {
        $id = $this->option('id');
        if (!$id) {
            $this->error('ID is required!');
            return;
        }

        $task = Task::find($id);
        if (!$task) {
            $this->error('Task not found!');
            return;
        }

        $task->update(['status' => $status]);
        $this->info("Task marked as $status");
    }

    private function listTasks()
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            $this->info("[{$task->id}] {$task->description} ({$task->status})");
        }
    }
}
