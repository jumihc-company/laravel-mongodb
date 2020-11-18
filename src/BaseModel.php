<?php
/**
 * User: YL
 * Date: 2020/11/17
 */

namespace Jmhc\Mongodb;

use Jenssegers\Mongodb\Eloquent\Model;
use Jmhc\Database\Contracts\DatabaseInterface;
use Jmhc\Database\Scopes\PrimaryKeyDescScope;
use Jmhc\Database\Traits\DatabaseTrait;

/**
 * 基础模型
 * @method DatabaseTrait initialize()
 * @package Jmhc\Mongodb
 */
class BaseModel extends Model implements DatabaseInterface
{
    use DatabaseTrait;

    /**
     * 关闭属性保护
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * 是否使用主键倒序作用域
     * @var bool
     */
    protected static $usePrimaryKeyDescScope = true;

    protected function initializeBefore()
    {
        // 设置链接名称
        if (empty($this->connection)) {
            $this->setConnection('mongodb');
        }

        // 设置表名称
        if (empty($this->table)) {
            $this->setTable(static::getSnakePluralName());
        }
    }

    /**
     * {@inheritDoc}
     */
    protected static function boot()
    {
        parent::boot();

        if (static::$usePrimaryKeyDescScope) {
            static::addGlobalScope(PrimaryKeyDescScope::getInstance());
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getForeignKey()
    {
        return static::getSnakeSingularName() . '_' . ltrim($this->getKeyName(), '_');
    }
}