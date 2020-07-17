<?php
/**
 * Notes:
 * File name:AdminSelect
 * Create by: Jay.Li
 * Created on: 2020/7/17 0017 16:13
 */


namespace App\Traits;


trait AdminSelect
{
    protected function toNewTree()
    {
        $data = $this->buildSelectOptions();

        return collect($data)->prepend("ROOT", 0)->toArray();
    }

    protected function buildSelectOptions(array $nodes = [], $parentId = 0, $prefix = '', $space = '&nbsp;')
    {
        $prefix = $prefix ?: '┝'.$space;

        $options = [];

        if (empty($nodes)) {
            $nodes = $this->allNodes();
        }

        foreach ($nodes as $index => $node) {
            if ($node['parent'] == $parentId) {
                $node['name'] = $prefix.$space.$node['name'];

                $childrenPrefix = str_replace('┝', str_repeat($space, 6), $prefix).'┝'.str_replace(['┝', $space], '', $prefix);

                $children = $this->buildSelectOptions($nodes, $node['id'], $childrenPrefix);

                $options[$node['id']] = $node['name'];

                if ($children) {
                    $options += $children;
                }
            }
        }

        return $options;
    }
}
