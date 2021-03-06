<?php
/**
 * 新闻分类控制器
 */
class NewsTplAction extends HomeAction
{
    /**
     * ls
     */
    public function ls()
    {
        $tplList = D('Newstype')->order('sort desc')->limit(0,2)->select();
        $this->assign('list', $tplList);
        $this->display();
    }

    /**
     * info
     */
    public function info()
    {
        $tplObj = D('Newstype');
        if(empty($_POST)){
            $id = $this->_get('id');
            if(!empty($id)){
                $info = $tplObj->where('id='.$id)->find();
                $this->assign('info', $info);
            }
            $this->display();
            exit;
        }
        $data = $this->_post();
        $data['time_modify'] = time();
        $id = $this->_post('id');
        if(empty($id)){
            $data['time_add'] = time();
            $tplObj->add($data);
        }else{
            $tplObj->save($data);
        }
        $this->success('操作成功');
    }

    public function del(){
        //删除的ID的数组
        $delIds = array();

        //POST方法删除的ID，批量删除的ID
        $postIds = $this->_post('id');
        if (!empty($postIds)) {
            $delIds = $postIds;
        }

        //GET方法删除
        //trim
        $getId = intval($this->_get('id'));
        if (!empty($getId)) {
            $delIds[] = $getId;
        }

        //判断是否为空
        if (empty($delIds)) {
            $this->error('请选择您要删除的新闻');
        }

        $map['id'] = array('in', $delIds);
        $result = D('Newstype')->where($map)->delete();
        if(!empty($result)){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}

?>
