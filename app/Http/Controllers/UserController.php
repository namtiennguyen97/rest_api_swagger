<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\implement\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @OA\Get(
     *      path="/api/users",
     *      tags={"users list"},
     *      summary="Get list users",
     *      description="Returns list users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       )
     *     )
     */
    public function index(){
        return response()->json([
            'user'=> $this->userService->index(),
            'status'=>Response::HTTP_OK,
            'message' => 'get list of user successfully!'
        ]);
    }

    /**
     * @OA\POST  (
     *  path="/api/users/create",
     *  description="create a user",
     *  operationId="create user",
     *  tags={"user create"},
     *  @OA\RequestBody(
     *      required=true,
     *      description="Fill into formdata",
     *      @OA\JsonContent(
     *          required={"name","email","password"},
     *          @OA\Property(property="name", type="string", format="text", example="nam"),
     *          @OA\Property(property="email", type="email", format="email", example="nam@gmail.com"),
     *          @OA\Property(property="password", type="password", format="number", example="123456"),
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Created success",
     *      @OA\JsonContent(
     *          @OA\Property(property="message", type="string", example="Created!")
     *      )
     *  )
     * )
     */
    public function createUser(Request $request){
        $this->userService->create($request->all());
        return \response()->json([
            Response::HTTP_OK,
            'message' => 'Create User successfully'
        ]);
    }

    /**
     * @OA\Get    (
     *  path="/api/users/show/{id}",
     *  description="show an user",
     *  summary="show user",
     *  operationId="show user",
     *  tags={"user show detail"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="number",
     *             example="1"
     *         )
     *     ),
     *  @OA\Response(
     *      response=200,
     *      description="get user",
     *      @OA\JsonContent(
     *          @OA\Property(property="status", type="number", example="200")
     *      )
     *  )
     * )
     */
    public function showById($id){
        $user = $this->userService->show($id);
        return \response()->json([
            'message' => 'Show user successfully',
            'user' => $user,
            Response::HTTP_OK
        ]);
    }

    /**
     * @OA\POST     (
     *  path="/api/users/update/{id}",
     *  description="update an user",
     *  summary="update user by id",
     *  operationId="update an user by id",
     *  tags={"user update"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="number",
     *             example="1"
     *         )
     *     ),
     *  @OA\RequestBody(
     *      required=true,
     *      description="Fill into formdata",
     *      @OA\JsonContent(
     *          required={"name","email","password"},
     *          @OA\Property(property="name", type="string", format="text", example="nam"),
     *          @OA\Property(property="email", type="email", format="email", example="nam@gmail.com"),
     *          @OA\Property(property="password", type="password", format="number", example="123456"),
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="update user",
     *      @OA\JsonContent(
     *          @OA\Property(property="status", type="number", example="200")
     *      )
     *  )
     * )
     */
    public function updateUser(Request $request,$id){
//        $user = User::findOrFail($id);
        $this->userService->update($request->all(), $id);
        return \response()->json([
            'message'=> 'update user successfully!',
            'status' => Response::HTTP_OK
        ]);
    }

    /**
     * @OA\Delete    (
     *  path="/api/users/delete/{id}",
     *  description="delete an user",
     *  summary="delete user",
     *  operationId="delete user",
     *  tags={"user deletion"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="number",
     *             example="1"
     *         )
     *     ),
     *  @OA\Response(
     *      response=200,
     *      description="deleted user",
     *      @OA\JsonContent(
     *          @OA\Property(property="status", type="number", example="200")
     *      )
     *  )
     * )
     */
    public function deleteUser($id){
        $this->userService->delete($id);
        return \response()->json([
           'message' => 'user deleted successfully!',
           'status'  => Response::HTTP_OK
        ]);
    }
}
