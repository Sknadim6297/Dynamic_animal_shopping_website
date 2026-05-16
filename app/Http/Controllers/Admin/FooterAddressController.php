<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterAddress;

class FooterAddressController extends Controller
{
    public function index()
    {
        $addresses = FooterAddress::latest()->get();
        return view('admin.footer-address.index', compact('addresses'));
    }

    public function create()
    {
        return view('admin.footer-address.create');
    }

    public function store(Request $request)
    {
        FooterAddress::create($request->all());
        return redirect()->route('admin.footer.address.index')->with('success', 'Added successfully');
    }

    public function edit($id)
    {
        $address = FooterAddress::findOrFail($id);
        return view('admin.footer-address.edit', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $address = FooterAddress::findOrFail($id);
        $address->update($request->all());
        return redirect()->route('admin.footer.address.index')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        FooterAddress::findOrFail($id)->delete();
        return back()->with('success', 'Deleted');
    }
}