<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SupportTicketController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('chamados.cria_chamado');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'prioridade' => 'required|in:baixa,média,alta',
            'imagem' => 'nullable|image|max:2048'
        ]);
        
        $imagemUrl = null;

        if ($request->hasFile('imagem')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('imagem')->getRealPath(), [
                'folder' => 'support_tickets',
                'transformation' => ['quality' => 'auto'],
            ])->getSecurePath();
    
            $imagemUrl = $uploadedFileUrl;
        }

        SupportTicket::create([
            'user_id' => 1, 
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'prioridade' => $request->prioridade,
            'imagem' => $imagemUrl
        ]);

        return redirect()->route('chamados.cria_chamado')->with('success','Chamado enviado com sucesso!');
    }

    public function show(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupportTicket $supportTicket)
    {
        //
    }
}
