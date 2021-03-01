<?php

namespace Tests\Request;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProjectRequest;
use Tests\TestCase;

class ProjectRequestTest extends TestCase
{

    /**
     * @dataProvider dataproviderProjectForm
     */
    public function testProjectFormValidation($data, $expect)
    {
        $rules = (new ProjectRequest())->rules();
        $validator = Validator::make($data, $rules);
        $result = $validator->passes();

        $this->assertEquals($expect, $result);
    }

  public function dataproviderProjectForm()
  {
    return [
        [
            '正常' => [
                'title' => str_repeat('a', 20)
            ], true,
        ],
        [
            '必須エラー' => [
                'title' => ''
            ], false,
        ],
        [
            '正常' => [
                'title' => str_repeat('a', 21)
            ], false
        ]
    ];
  }
}
