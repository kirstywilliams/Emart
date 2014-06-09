<?php
	class PsStockOk implements IPipelineSection
	{
		public function Process($processor)
		{
			// Audit
			$processor->CreateAudit('PsStockOk started.', 20300);
			
			/* The method is called when the warehouse confirms that stock is
			available, so we don't have to do anything here except audit */
			$processor->CreateAudit('Stock confirmed by warehouse.', 20302);
			
			// Update order status
			$processor->UpdateOrderStatus('Awaiting Payment');
			
			// Continue processing
			$processor->mContinueNow = true;
			
			// Audit
			$processor->CreateAudit('PsStockOk finished.', 20301);
		}
	}
?>