<?php


namespace keystorage\helpers;


use Yii;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

class Helper
{
    /**
     * Renders any data provider summary text.
     *
     * @param \yii\data\DataProviderInterface $dataProvider
     * @param array $options the HTML attributes for the container tag of the summary text
     * @return string the HTML summary text
     */
    public static function getDataProviderSummary($dataProvider, $options = [])
{
    $count = $dataProvider->getCount();
    if ($count <= 0) {
        return '';
    }
    $tag = ArrayHelper::remove($options, 'tag', 'div');
    if (($pagination = $dataProvider->getPagination()) !== false) {
        $totalCount = $dataProvider->getTotalCount();
        $begin = $pagination->getPage() * $pagination->pageSize + 1;
        $end = $begin + $count - 1;
        if ($begin > $end) {
            $begin = $end;
        }
        $page = $pagination->getPage() + 1;
        $pageCount = $pagination->pageCount;
        return Html::tag($tag, Yii::t('yii', 'Showing <b>{begin, number}-{end, number}</b> of <b>{totalCount, number}</b> {totalCount, plural, one{item} other{items}}.', [
            'begin' => $begin,
            'end' => $end,
            'count' => $count,
            'totalCount' => $totalCount,
            'page' => $page,
            'pageCount' => $pageCount,
        ]), $options);
    } else {
        $begin = $page = $pageCount = 1;
        $end = $totalCount = $count;
        return Html::tag($tag, Yii::t('yii', 'Total <b>{count, number}</b> {count, plural, one{item} other{items}}.', [
            'begin' => $begin,
            'end' => $end,
            'count' => $count,
            'totalCount' => $totalCount,
            'page' => $page,
            'pageCount' => $pageCount,
        ]), $options);
    }
}
}