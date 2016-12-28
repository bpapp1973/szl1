<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Repositories\OrdersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrdersController extends AppBaseController
{
    /** @var  OrdersRepository */
    private $ordersRepository;

    public function __construct(OrdersRepository $ordersRepo)
    {
        $this->ordersRepository = $ordersRepo;
    }

    /**
     * Display a listing of the Orders.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ordersRepository->pushCriteria(new RequestCriteria($request));
        $orders = $this->ordersRepository->all();

        return view('models.orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new Orders.
     *
     * @return Response
     */
    public function create()
    {
        return view('models.orders.create');
    }

    /**
     * Store a newly created Orders in storage.
     *
     * @param CreateOrdersRequest $request
     *
     * @return Response
     */
    public function store(CreateOrdersRequest $request)
    {
        $input = $request->all();

        $orders = $this->ordersRepository->create($input);

        Flash::success('A Orders létrehoztuk');

        return redirect(route('orders.edit', $orders->id));
    }

    /**
     * Display the specified Orders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('A Orders nem találjuk');

            return redirect(route('home'));
        }

        return view('models.orders.show')->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified Orders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('A Orders nem találjuk');

            return redirect(route('home'));
        }

        return view('models.orders.edit')->with('orders', $orders);
    }

    /**
     * Update the specified Orders in storage.
     *
     * @param  int              $id
     * @param UpdateOrdersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrdersRequest $request)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('A Orders nem találjuk');

            return redirect(route('home'));
        }

        $orders = $this->ordersRepository->update($request->all(), $id);

        Flash::success('A Orders mentettük');

        return view('models.orders.show')->with('orders', $orders);
    }

    /**
     * Remove the specified Orders from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('A Orders nem találjuk');

            return redirect(route('home'));
        }

        $this->ordersRepository->delete($id);

        Flash::success('A Orders töröltük');

        return redirect(route('home'));
    }
}
