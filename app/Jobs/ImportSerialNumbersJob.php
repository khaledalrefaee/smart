<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SerialNumbersImport;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
class ImportSerialNumbersJob implements ShouldQueue
{
   
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $productId;
    protected $filePath;
    /**
     * Create a new job instance.
     */
    public function __construct($productId, $filePath)
    {
        $this->productId = $productId;
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     */
 public function handle()
{
    \Log::info('Job started for product ID: ' . $this->productId);
    \Log::info('File path: ' . $this->filePath);

    try {
        Excel::import(new SerialNumbersImport($this->productId), $this->filePath);
        \Log::info('Job completed successfully.');
    } catch (\Exception $e) {
        \Log::error('Error in ImportSerialNumbersJob: ' . $e->getMessage());
        throw $e; // إعادة إرسال الخطأ
    }
}

}
