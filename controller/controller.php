<?php
    include '..\model\news.php';
    class Controller{
        private $news;
        function __construct(){
            $this->news=new News();
        }
        function showController():array{
            //Conseguir noticias sin autentificacion
            try{
                $news=$this->news->show();
                $data=['status'=>'success','code'=>200,'news'=>$news];
            }catch(PDOException $e){
                $data=['status'=>'success','code'=>200,'message'=>$e->getMessage()];
            }
            return $data;
        }
        function deleteController($id=null):array{
            //Comprobar que llegue la is correctamente
            if(!is_null($id) && is_numeric($id)){
                //Comprobar que exista la elemento
                $news=$this->news->find($id);
                if(count($news)>0){
                    //Borrar noticia
                    try{
                        $this->news->delete($id);
                        $data=['status'=>'success','code'=>200,'message'=>'Deleted news'];
                    }catch(PDOException $e){
                        $data=['status'=>'error','code'=>400,'message'=>$e->getMessage()];
                    }
                }else{
                    $data=['status'=>'error','code'=>400,'message'=>'The news dont exists'];
                }
            }else{
                $data=['status'=>'error','code'=>400,'message'=>'Incorrect ID'];
            }
            return $data;
        }
        function createController($request=null):array{
            //Comprobar existencia parametros array
            if(isset($request['title']) && isset($request['text']) && isset($request['category']) && isset($request['date'])){
                try{
                    //Crear noticia
                    $this->news->create($request);
                    $data=['status'=>'success','code'=>200,'message'=>'Created news'];
                }catch(PDOException $e){
                    $data=['status'=>'error','code'=>400,'message'=>$e->getMessage()];
                }      
            //Comprobar si el POST se envio
            }else if($request==null){
                $data=['status'=>'error','code'=>400,'message'=>'Send POST'];
            //Si el POST le faltan datos
            }else{
                $data=['status'=>'error','code'=>400,'message'=>'Send complete form'];
            }
            return $data;
        }
        function updateController($request=null):array{
            //Comprobar existencia parametros array
            if(isset($request['id']) && isset($request['title']) && isset($request['text']) && isset($request['category']) && isset($request['date'])){
                try{
                    //Crear noticia
                    $this->news->update($request);
                    $data=['status'=>'success','code'=>200,'message'=>'Update news'];
                }catch(PDOException $e){
                    $data=['status'=>'error','code'=>400,'message'=>$e->getmessage()];
                } 
            //Comprobar si el POST se envio
            }else if($request==null){
                $data=['status'=>'error','code'=>400,'message'=>'Send POST'];
            //Si el POST le faltan datos
            }else{
                $data=['status'=>'error','code'=>400,'message'=>'Send complete form'];
            }
            return $data;
        }
        function __destruct(){}
    }
?>