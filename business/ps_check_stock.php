<?php
	class PsCheckStock implements IPipelineSection
	{
		private $_mProcessor;
		
		public function Process($processor)
		{
			// Set processor reference
			$this->_mProcessor = $processor;
			
			// Audit
			$processor->CreateAudit('PsCheckStock started.', 20200);

			// Send mail to warehouse
			$processor->MailSupplier(STORE_NAME . ' stock check.',
			$this->GetMailBody());

			// Audit
			$processor->CreateAudit('Notification email sent to warehouse.', 20202);
			
			// Update order status
			$processor->UpdateOrderStatus('Awaiting Stock Confirmation');
			
			// Audit
			$processor->CreateAudit('PsCheckStock finished.', 20201);
		}
		
		private function GetMailBody()
		{
			$body = 'The following products have been ordered:';
			$body .= "\n\n";
			$body .= $this->_mProcessor->GetOrderAsString(false);
			$body .= "\n\n";
			$body .= 'Please check availability and confirm via ' .
			Link::ToAdmin();
			$body .= "\n\n";
			$body .= 'Order reference number: ';
			$body .= $this->_mProcessor->mOrderInfo['orderID'];
			return $body;
		}
	}
?>