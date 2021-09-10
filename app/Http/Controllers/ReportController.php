<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Validator;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    public function generate(ReportRequest $request)
    {

        $age = $request->only('age');

        $data = Student::getStudentsByAge($age['age']);

        if ($data->isEmpty()) {
            return redirect()->back()->withErrors('Não existem alunos com essa idade no sistema!');
        }

        $filename = 'Relatório de Alunos por Idade';
        $mpdf = new Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $html_report = View::make('reports.byage')->with(['data' => $data, 'age' => $age['age']]);
        $html_report = $html_report->render();

        $mpdf->SetHeader('Página {PAGENO}');

        $mpdf->WriteHTML($html_report);
        $mpdf->Output($filename, 'I');

    }
}
