<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Outcome;
use App\Models\Pocket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Output\Output;
use Yajra\DataTables\Facades\DataTables;

class PocketController extends Controller
{
    public function index(Request $request)
    {
        return view('pocket');
    }

    public function tableOutcome(Request $request)
    {
        $currentMonth = now()->month; // Bulan sekarang
        $currentYear = now()->year;   // Tahun sekarang
        $outcome = Outcome::where('user_id', Auth::user()->id)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->orderBy('created_at', 'desc')
            ->get();
        if ($request->ajax()) {
            return Datatables::of($outcome)
                ->addIndexColumn()
                ->editColumn('date', function ($row) {
                    return Carbon::parse($row->date)->translatedFormat('d F Y'); // Format: 21 Januari 2025
                })
                ->editColumn('outcome', function ($row) {
                    return 'Rp. ' . number_format($row->outcome, 2, ',', '.'); // Format: Rp.1.000.000,00
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="text-center">
                    <a href="javascript:void(0)" class="edit btn btn-primary btn-sm"><i class="ri-eye-fill"></i></a>
                    <a href="javascript:void(0)" class="deleteOutcome btn btn-danger btn-sm" data-id="' . $row->id . '"><i class="ri-delete-bin-2-fill"></i></a>
                    </div>
                    ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pocket');
    }

    // DATATABLES FOR INCOME DATA
    public function tableIncome(Request $request)
    {
        $currentMonth = now()->month; // Bulan sekarang
        $currentYear = now()->year;   // Tahun sekarang
        $income = Income::where('user_id', Auth::user()->id)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->orderBy('created_at', 'desc')
            ->get();
        if ($request->ajax()) {

            return Datatables::of($income)
                ->addIndexColumn()
                ->editColumn('date', function ($row) {
                    return Carbon::parse($row->date)->translatedFormat('d F Y'); // Format: 21 Januari 2025
                })
                ->editColumn('income', function ($row) {
                    return 'Rp. ' . number_format($row->income, 2, ',', '.'); // Format: Rp.1.000.000,00
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="text-center">
                    <a href="javascript:void(0)" class="edit btn btn-primary btn-sm"><i class="ri-eye-fill"></i></a>
                    <a href="javascript:void(0)" class="deleteIncome btn btn-danger btn-sm" data-id="' . $row->id . '"><i class="ri-delete-bin-2-fill"></i></a>
                    </div>
                    ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pocket');
    }

    // GET DATA FORM INCOME
    public function getFormIncome()
    {
        $currentMonth = now()->month; // Bulan sekarang
        $currentYear = now()->year;   // Tahun sekarang

        $income = Income::where('user_id', Auth::user()->id)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->get(['income', 'date']);

        $outcome = Outcome::where('user_id', Auth::user()->id)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->get(['outcome', 'date']);

        $in = ($income->sum('income') ?? 0) - ($outcome->sum('outcome') ?? 0);
        $date = $income->max('date');

        return response()->json(['in' => $in, 'date' => $date]);
    }

    public function getTotalOutcome()
    {
        $currentMonth = now()->month; // Bulan sekarang
        $currentYear = now()->year;   // Tahun sekarang
        $outcome = Outcome::where('user_id', Auth::user()->id)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->get(['outcome', 'date']);


        $total = $outcome->sum('outcome') ?? 0;
        $date = Carbon::parse(now())->translatedFormat('d F Y');

        return response()->json(['total' => $total, 'date' => $date]);
    }

    public function getTotalIncome()
    {
        $currentMonth = now()->month; // Bulan sekarang
        $currentYear = now()->year;   // Tahun sekarang
        $income = Income::where('user_id', Auth::user()->id)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->get(['income', 'date']);

        $total = $income->sum('income') ?? 0;
        $date = Carbon::parse(now())->translatedFormat('d F Y');

        return response()->json(['total' => $total, 'date' => $date]);
    }

    public function storeIncome(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'income' => 'required|numeric|min:1',
            'date'   => 'required|date',
        ], [
            'income.required' => 'Nilai income tidak boleh kosong.',
            'income.numeric' => 'Nilai income harus angka.',
            'income.min' => 'Nilai income tidak boleh 0.',
            'date.required' => 'Nilai tanggal tidak boleh kosong.',
            'date.date' => 'Format tanggal salah.',
        ]);

        // Simpan data ke tabel Pocket
        Income::create([
            'income' => $request->income,
            'date'   => $request->date,
            'user_id' => Auth::user()->id
        ]);

        // Redirect atau berikan response sesuai kebutuhan Anda
        return redirect()->route('home')->with('success', 'Income kamu bertambah.');
    }

    public function storeOutcome(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'outcome' => 'required|numeric',
            'date'   => 'required|date',
            'deskripsi' => 'required|max:100'
        ], [
            'outcome.required' => 'Nilai outcome tidak boleh kosong.',
            'outcome.numeric' => 'Nilai outcome harus angka.',
            'date.required' => 'Nilai tanggal tidak boleh kosong.',
            'date.date' => 'Format tanggal salah.',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong.',
            'deskripsi.max' => 'Deskripsi terlalu panjang, max 100 karakter.'
        ]);

        // Simpan data ke tabel Pocket
        Outcome::create([
            'outcome' => $request->outcome,
            'deskripsi' => $request->deskripsi,
            'date'   => $request->date,
            'user_id' => Auth::user()->id
        ]);

        // Redirect atau berikan response sesuai kebutuhan Anda
        return redirect()->route('home')->with('success', 'Tetep ingat jangan boros ya!.');
    }


    // DELETE INCOME FUNCTION
    public function destroyIncome($id)
    {
        $income = Income::find($id);
        if (!$income) {
            return response()->json(['status' => 'error', 'message' => 'Income tidak ditemukan!.']);
        }

        $income->delete();
        return response()->json(['status' => 'success', 'message' => 'Berhasil menghapus Income!.']);
    }

    public function destroyOutcome($id)
    {
        $outcome = Outcome::find($id);
        if (!$outcome) {
            return response()->json(['status' => 'error', 'message' => 'Outcome tidak ditemukan!.']);
        }

        $outcome->delete();
        return response()->json(['status' => 'success', 'message' => 'Berhasil menghapus Outcome!.']);
    }
}
