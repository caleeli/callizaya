<?php
/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title="Coredump API",
 *         description="",
 *         @OA\Contact(
 *             email="info@coredump.com"
 *         ),
 *         @OA\License(
 *             name="Apache 2.0",
 *             url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *         )
 *     ),
 * )
 * @OA\Get(
 *     path="/api/data/users",
 *     summary="Mostrar usuarios",
 *     @OA\Response(
 *         response=200,
 *         description="Mostrar todos los usuarios."
 *     ),
 *     @OA\Response(
 *         response="default",
 *         description="Lista de usuarios."
 *     )
 * )
 *
 *  @OA\Post(
 *      tags={"jdd-menus"},
 *      path="/api/data/user",
 *      summary="Obtiene los menues del usuario",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              @OA\Property(
 *                  property="call",
 *                  type="object",
 *                  @OA\Property(
 *                      property="method",
 *                      type="string",
 *                      example="allMenus",
 *                  ),
 *                  @OA\Property(
 *                      property="parameters",
 *                      type="object",
 *                  ),
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="success",
 *          @OA\JsonContent(ref="#/components/schemas/Process")
 *      ),
 *  )
 */
