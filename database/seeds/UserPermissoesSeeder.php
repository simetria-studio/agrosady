<?php

use App\User;
use Illuminate\Database\Seeder;

class UserPermissoesSeeder extends Seeder {

    public function run() {

        DB::table('permission_role')->delete();
        DB::table('permission_user')->delete();
        DB::table('permissions')->delete();
        DB::table('role_user')->delete();
        DB::table('roles')->delete();

        $grupo_admin = Defender::createRole('Administrador');
        $grupo_usuario = Defender::createRole('Usuario');

//       BANNER
        $banner_nenhuma = Defender::createPermission('banner.nenhuma', 'Banner - Nenhuma');
        $banner_total = Defender::createPermission('banner.total', 'Banner - Total');

//        AGENDA DE EVENTOS
        $ae_nenhuma = Defender::createPermission('ae.nenhuma', 'Agenda de Evento - Nenhuma');
        $ae_total = Defender::createPermission('ae.total', 'Agenda de Evento - Total');

//        BIBLIOTECA VIRTUAL
        $bv_nenhuma = Defender::createPermission('bv.nenhuma', 'Biblioteca Virtual - Nenhuma');
        $bv_total = Defender::createPermission('bv.total', 'Biblioteca Virtual - Total');

//        BLOG
        $blog_nenhuma = Defender::createPermission('blog.nenhuma', 'Blog - Nenhuma');
        $blog_total = Defender::createPermission('blog.total', 'Blog - Total');
        
//        CURSOS
        $produtos_nenhuma = Defender::createPermission('produtos.nenhuma', 'Produtos - Nenhuma');
        $produtos_total = Defender::createPermission('produtos.total', 'Produtos - Total');

//        ENQUETE
        $enquete_nenhuma = Defender::createPermission('enquete.nenhuma', 'Enquete - Nenhuma');
        $enquete_total = Defender::createPermission('enquete.total', 'Enquete - Total');

//        GALERIA DE IMAGEM
        $gi_nenhuma = Defender::createPermission('gi.nenhuma', 'Galeria de Imagem - Nenhuma');
        $gi_total = Defender::createPermission('gi.total', 'Galeria de Imagem - Total');

//        GALERIA DE VIDEO
        $gv_nenhuma = Defender::createPermission('gv.nenhuma', 'Galeria de Video - Nenhuma');
        $gv_total = Defender::createPermission('gv.total', 'Galeria de Video - Total');

//        UND
        $und_nenhuma = Defender::createPermission('und.nenhuma', 'UND - Nenhuma');
        $und_total = Defender::createPermission('und.total', 'UND - Total');

//        USUARIO
        $usuario_nenhuma = Defender::createPermission('usuario.nenhuma', 'Usuario - Nenhuma');
        $usuario_total = Defender::createPermission('usuario.total', 'Usuario - Total');

//        MOTORISTA
        $motorista_nenhuma = Defender::createPermission('motorista.nenhuma', 'Motorista - Nenhuma');
        $motorista_total = Defender::createPermission('motorista.total', 'Motorista - Total');

//        OPERAÇÃO
        $operacao_nenhuma = Defender::createPermission('operacao.nenhuma', 'Operação - Nenhuma');
        $operacao_total = Defender::createPermission('operacao.total', 'Operação - Total');

//        RASTREIO
        $rastreio_nenhuma = Defender::createPermission('rastreio.nenhuma', 'Rastreio - Nenhuma');
        $rastreio_total = Defender::createPermission('rastreio.total', 'Rastreio - Total');

//        RD DIGITAL
        $rd_nenhuma = Defender::createPermission('rd.nenhuma', 'RD - Nenhuma');
        $rd_total = Defender::createPermission('rd.total', 'RD - Total');

//      SEO
        $seo_nenhuma = Defender::createPermission('seo.nenhuma', 'Seo - Nenhuma');
        $seo_total = Defender::createPermission('seo.total', 'Seo - Total');
        
//      INSTITUCIONAL
        $institucional_nenhuma = Defender::createPermission('institucional.nenhuma', 'Institucional - Nenhuma');
        $institucional_total = Defender::createPermission('institucional.total', 'Institucional - Total');


        $user = User::find(1);

        $user->attachRole($grupo_admin);

        $user->attachPermission($banner_total);
        $user->attachPermission($bv_total);
        $user->attachPermission($blog_total);
        $user->attachPermission($produtos_total);
        $user->attachPermission($enquete_total);
        $user->attachPermission($ae_total);
        $user->attachPermission($gi_total);
        $user->attachPermission($gv_total);
        $user->attachPermission($und_total);
        $user->attachPermission($usuario_total);
        $user->attachPermission($motorista_total);
        $user->attachPermission($operacao_total);
        $user->attachPermission($rastreio_total);
        $user->attachPermission($rd_total);
        $user->attachPermission($seo_total);
        $user->attachPermission($institucional_total);
    }

}
