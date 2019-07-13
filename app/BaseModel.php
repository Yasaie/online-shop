<?php
/**
 * @package     shop
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-07-08
 */

namespace App;

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $modified_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereModifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryTrait dictionary()
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    /**
     * @package getAttribute
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param string $key
     *
     * @return Carbon|Verta|mixed
     * @throws \Exception
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, ['updated_at', 'created_at'])) {
            Verta::setStringFormat('Y-m-d - H:i');
            $date = app()->getLocale() == 'fa'
                ? new Verta($value)
                : new Carbon($value);
            return $date;
        }

        return $value;
    }
}