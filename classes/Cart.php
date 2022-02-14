<?php

class Cart
{
    protected $content = [];

    public function __construct()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $this->content = $_SESSION['cart'];
    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function plus(int $id): self
    {
        if (!isset($this->content[$id])) {
            $this->content[$id] = 0;
        }

        $this->content[$id]++;

        return $this;
    }

    public function min(int $id): self
    {
        if (isset($this->content[$id])) {
            $this->content[$id]--;

            if ($this->content[$id] <= 0) {
                unset($this->content[$id]);
            }
        }

        return $this;
    }

    public function delete(int $id): self
    {
        if (isset($this->content[$id])) {
            unset($this->content[$id]);
        }

        return $this;
    }

    public function empty(): self
    {
        $this->content = [];

        return $this;
    }

    public function save(): self
    {
        $_SESSION['cart'] = $this->getContent();

        return $this;
    }

    public function handle(array $getData): bool
    {
        if (isset($getData['id'])) {
            $id = $getData['id'];

            $mode = 'plus';
            if (isset($getData['mode'])) {
                $mode = $getData['mode'];
            }

            switch ($mode) {
                case 'plus':
                    $this->plus($id);
                    break;
                case 'min':
                    $this->min($id);
                    break;
                case 'delete':
                    $this->delete($id);
                    break;
            }
            $this->save();

            return true;
        }

        if (isset($getData['mode']) && $getData['mode'] == 'empty') {
            $this->empty();
            $this->save();
            return true;
        }
        return false;
    }
}
